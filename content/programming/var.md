---
title: 株価の基礎的なリターンリスクを算出(Python)
date: 2018-02-24
categories: [ "プログラミング" ]
tags: [ "プログラミング", "python", "Bitcoin" ]
description: プログラミング初学者・文系の方向けに知っておいた方がいいプログラミング知識を扱います。今回は、データセットからFacebookの2年間分の株価データを抜き出し、年間リスクリターンの算出をしていきます。
---

### コード例

    import numpy as np
    import pandas as pd
    import pandas_datareader.data as web

    # define stock that you take
    ticker = ["FB"]
    # web.DataReader(取得したい銘柄, どこから取得するか, いつから始めるか)
    sec_data = web.DataReader(ticker, data_source="morningstar", start="2016-1-1")["Close"]
    #下から５つ表示
    print(sec_data.tail())
    #収益率
    sec_return = np.log(sec_data/sec_data.shift(1))
    #標準偏差
    sec_return_std = sec_return.std() 
    #分散
    sec_return_var = sec_return.std()*250**0.5

    print(sec_return_std, sec_return_var)
    # 0.014795688350667528 0.23394037369064727

### 解説

標準偏差(不偏標準偏差 == np.std(a, ddof=1))
    std()
分散
    std() * 1年間のマーケット日数 ** 0.5
    '**'は二乗
