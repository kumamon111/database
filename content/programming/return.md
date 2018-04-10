---
title: Bitcoinの収益率を対数差分で出して見た。(Python)
date: 2018-02-24
categories: [ "プログラミング" ]
tags: [ "プログラミング", "python", "Bitcoin" ]
description: プログラミング初学者・文系の方向けに知っておいた方がいいプログラミング知識を扱います。今回はBitcoinの2012年からの収益率を求め、それをグラフ化します。
---

### コード例

    import quandl
    import matplotlib.pyplot as plt
    import pandas as pd
    import numpy as np

    # get the data from quandl
    mydata_01 = quandl.get('BCHARTS/BITSTAMPUSD', start_date="2012-01-01", end_date="2017-02-23")
    #print(mydata_01)

    # csv
    mydata_01.to_csv('データ保存先')

    # log returns #今回はこちらを使用
    # log(クローズの価格 ÷ 1日前のクローズの価格)
    mydata_01['log_return'] = np.log(mydata_01['Close'] / mydata_01['Close'].shift(1))

    # simple returns
    # (クローズの価格 ÷ 1日前のクローズの価格) - 1
    # mydata_01['simple_return'] = (mydata_01['Close'] / mydata_01['Close'].shift(1)) - 1

    mydata_01['simple_return']
    mydata_01['log_return'].plot()

    # show matrix
    plt.show()


<img src="/images/Figure_1.png">

### 解説

対数(log)を使用したのは、分散を一定に近くするため。

価格データ: quandlから取得。（その他のコードは<a href = "https://www.quandl.com/search?query=">こちら</a>から）

コード:

１つ前のデータ
    
    shift()

プロット

    .plot()

グラフ表示

    .show()

<script type="text/javascript">amzn_assoc_ad_type ="responsive_search_widget"; amzn_assoc_tracking_id ="kumamon10a-22"; amzn_assoc_marketplace ="amazon"; amzn_assoc_region ="JP"; amzn_assoc_placement =""; amzn_assoc_search_type = "search_widget";amzn_assoc_width ="auto"; amzn_assoc_height ="auto"; amzn_assoc_default_search_category =""; amzn_assoc_default_search_key ="ファイナンス　プログラミング";amzn_assoc_theme ="light"; amzn_assoc_bg_color ="FFFFFF"; </script><script src="//z-fe.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&Marketplace=JP"></script>







