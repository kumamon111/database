---
title: 今更ながら加重平均と単純平均の違いって？
date: 2018-02-26
categories: [ "プログラミング" ]
tags: [ "プログラミング", "python", "Bitcoin" ]
description: プログラミング初学者・文系の方向けに知っておいた方がいいプログラミング知識を扱います。今回は、加重平均と単純平均について。Pythonでコードを動かしながら学んでいきます。
---

### 今更ながら加重平均と単純平均の違いって？

- 加重平均 (weighted average)

単純平均の算式に株式数・数量（単位換算の量）等でウエイトすることにより求められる平均価格 

an average resulting from the multiplication of each component by a factor reflecting its importance 


- 単純平均 (simple average)

対象となる銘柄を、それぞれ１株ずつ保有した場合の平均価格


うーん...

これだけじゃよくわからないと思うので、以下の例をご覧ください。

Now moving on to the example


### ソースコード

    import numpy as np
    import pandas as pd
    import pandas_datareader.data as web
    import matplotlib.pyplot as plt


    tickers = "BCHARTS/BITSTAMPUSD"
    cur_data = web.DataReader(tickers, 'quandl', '2018-02-23', '2018-02-26')[["Close", "VolumeCurrency"]]

</br>

quandle APIを使用して、4日間のビットコイン価格を取得します。

Using quandle API, Let's get the bitcoin data for 4 days I randomly select.

</br>

### データ


| Date       | Close    | VolumeCurrency     |
|------------|----------|--------------------|
| 2018-02-26 | 10372.99 | 153059742.86041    |
| 2018-02-25 | 9590.04  | 105367249.24681999 |
| 2018-02-24 | 9689.99  | 137805304.51942    |
| 2018-02-23 | 10166.1  | 160782973.04507    |

</br>

### 単純平均株価

単純平均は、簡単です。4日間の値段を足し合わせて割るだけの普通の平均です。

4日間の平均株価 = 9954.779999999999

</br>

ソースコード

    moving_av = cur_data["Close"].mean()

</br>

### 加重平均株価

こちらは少しトリッキーです。4日間の取引総額から4日間の取引数量を割ります。

データ上だと数量が出ないので、出来高から値段を割り引いて数量を出し、最後に合計します。

    sum(cur_data["VolumeCurrency"]/cur_data["Close"]

4日間代金総額/4日間の取引数量 = 9985.97326029

</br>

ソースコード

    w_moving_av = sum(cur_data["VolumeCurrency"])/sum(cur_data["VolumeCurrency"]/cur_data["Close"])


### 結果

    print(moving_av, w_moving_av)
    # 9954.779999999999 9985.97326029


違う結果が出ましたね！
