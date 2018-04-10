---
title: Pythonで機械学習！第一回
date: 2018-03-16
categories: [ "テクノロジー" ]
tags: [ "マシンラーニング", "ディープラーニング", "AI" ]
description: 文系のためのプログラミング学習。今日は機械学習の第一回、前処理を行います。
---



本日は機械学習第1回!



### 1. 前処理 Preprocessing

機械学習において、データの前処理は重要です。

そもそも前処理って何？っていう人も多いとは思いますが、料理で言う所の「焼き芋を蒸すまでのプロセス」です。

「???」

ですよね。まあ順に見ていきましょう。

例えば、「チョコレートの新商品を売りたい」っていうマーケターがいたとします。まず何をしますか？

データを取りますよね。これがまず最初の行程。

でも集めてきたデータだってそんなに万能なわけじゃない。欠損してる値とか外れ値とかもある。

これを取り除くのが行程2。

そして最後にデータの全てをコンピューターが読み込める形にする。これが行程3。

つまり、「美味しいさつまいもの選定 → 野菜ですからたまーに腐ってるとこもあるのでそこを切る → さつまいもは大きいですから小さい鍋の大きさに材料を切って入れる」

みたいな感じですかね！

とまあ例に困りましたが、大丈夫です。具体的にナロウダウンしたいと思います！

</br>

### 2. データの読み込み

ここからはコードで解説。こんな感じのデータ読み込んでいきます。

| Country | Age | Salary | Purchased |
|---------|-----|--------|-----------|
| japan   | 44  | 29000  | No        |
| us      | 50  | 48000  | Yes       |
| uk      | 40  | 62000  | No        |
| Spain   | 38  | 91000  | No        |
| japan   | 80  |  nan   | Yes       |
| France  | 35  | 58000  | Yes       |
| uk      | nan | 81000  | No        |
| France  | 27  | 79000  | Yes       |
| us      | 50  | 80000  | No        |
| mexico  | 48  | 67000  | Yes       |


    # import modules
    import numpy as np
    import pandas as pd
    import matplotlib.pyplot as plt

    # data import 

    dataset = pd.read_csv("Data.csv")
    x = dataset.iloc[:, :-1].values
    y = dataset.iloc[:, 3].values


iloc関数ですが、データから指定した行・列を取得する関数です。

    iloc[row, column]

ですのでこの場合、xは「最後から１つ目を除いた列を全て除いて取得」、yは「4列目だけ取得」となります。

注意して欲しいのですが、最初は0から数えるので、４列目を選択する場合は「3」とします。

</br>

### 3. Missing data

データののなかに「nan」がありますね。データはこのままだと処理できないので、これを少し変えます。

基本的に、この欠損値は、他のデータを平均したもので補います。

    from sklearn.preprocessing import Imputer
    imputer = Imputer(missing_values = "NaN", strategy = "mean", axis = 0)
    imputer = imputer.fit(x[:, 1:3])
    x[:,1:3] = imputer.transform(x[:, 1:3])

"Imputer"というモジュールを使い、欠損の部分に平均を当てはめます。

    [['japan' 44.0 29000.0]
    ['us' 50.0 48000.0]
    ['uk' 40.0 62000.0]
    ['Spain' 38.0 91000.0]
    ['japan' 80.0 66111.11111111111]
    ['France' 35.0 58000.0]
    ['uk' 45.77777777777778 81000.0]
    ['France' 27.0 79000.0]
    ['us' 50.0 80000.0]
    ['mexico' 48.0 67000.0]]

欠損の部分に、平均値が入りました。

</br>

### 4. 文字列を数値に

基本的に、機械学習を行う際にはデータは全て数字として表します。japanとかfranceとか、ここでは文字として表されていますが、これらも数字で表さなければなりません。

ここに関しては流れ作業でいいので、コードで覚えましょう。

    from sklearn.preprocessing import LabelEncoder, OneHotEncoder
    labelencoder_x = LabelEncoder()
    x[:,0] = labelencoder_x.fit_transform(x[:, 0])

    ### avoiding the feature of the number
    onehotencoder = OneHotEncoder(categorical_features = [0])
    x = onehotencoder.fit_transform(x[:,1:3]).toarray()

    labelencoder_y = LabelEncoder()
    y = labelencoder_y.fit_transform(y)
    
注意すべきは、一点です。

x, y の処理の違いに気づいたでしょうか。

xは、「LabelEncoder」「OneHotEncoder」

yは、「LabelEncoder」のみを使っています。

理由は簡単です。OneHotEncoderは、数字をダミー関数に変えます。

どういうことでしょうか。

今、Xを見ると

	 [2 44.0 29000.0]
	 [5 50.0 48000.0]
	 [4 40.0 62000.0]
	 [1 38.0 91000.0]
	 [2 80.0 66111.11111111111]
	 [0 35.0 58000.0]
	 [4 45.77777777777778 81000.0]
	 [0 27.0 79000.0]
	 [5 50.0 80000.0]
	 [3 48.0 67000.0]

この一番最初の列の[1,2,3,4,5,...]は、ダウンロードしたデータの国名を数字に変えたものです。

ここでどんな問題が考えられるでしょうか。簡単です。

コンピューターがこれを大小で考えてしまうのです。

しかし、この数字はあくまで記号であって、数字としての意味をなすべきものではありません。

だからこれをダミーとして扱うために「OneHotEncoder」を使い、このように数字を記号にします。

	0	0	0	0	1	0	0	0	0
	0	0	0	0	0	0	0	1	0
	0	0	0	1	0	0	0	0	0
	0	0	1	0	0	0	0	0	0
	0	0	0	0	0	0	0	0	1
	0	1	0	0	0	0	0	0	0
	0	0	0	0	0	1	0	0	0
	1	0	0	0	0	0	0	0	0
	0	0	0	0	0	0	0	1	0
	0	0	0	0	0	0	1	0	0


</br>

### 5. テストデータとトレーニングデータを分ける

次はデータの中でも練習問題と応用問題にわける作業を行います。

少し長くなってしまったので、続きはまた続編で！

<br/>

<script type="text/javascript">amzn_assoc_ad_type ="responsive_search_widget"; amzn_assoc_tracking_id ="kumamon10a-22"; amzn_assoc_marketplace ="amazon"; amzn_assoc_region ="JP"; amzn_assoc_placement =""; amzn_assoc_search_type = "search_widget";amzn_assoc_width ="auto"; amzn_assoc_height ="auto"; amzn_assoc_default_search_category =""; amzn_assoc_default_search_key ="機械学習";amzn_assoc_theme ="light"; amzn_assoc_bg_color ="FFFFFF"; </script><script src="//z-fe.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&Marketplace=JP"></script>

<br/>