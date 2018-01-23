---
title: Binanceからの価格取得 in Python
date: 2018-01-15
categories: [ "money" ]
tags: [ "留学生", "海外", "国内", "アルバイト", "高時給" ]
description: Binanceからの価格取得方法！
---


    # python 3.6.0
    # ターミナル上でpythonと入力
    # 三本の矢印が出たら起動成功。できなかったらpythonインストール。

    import requests
    import json

    # BinanceからEndpoint取得 ('https://api.binance.com/api')
    # 例えば24時間のticker取得（参照:https://github.com/binance-exchange/binance-official-api-docs/blob/master/rest-api.md#24hr-ticker-price-change-statistics）
    # Get api/v1/ticker/24hr

    url = "https://api.binance.com/api/v1/ticker/24hr"
    
    # ETH_BTCの現在価格を取得したい

    params = {"symbol":"ETHBTC"}
    
    # aは変数（なんでもいい）

    a = requests.get(url, params=params)
    a = a.json()
    a = a["lastPrice"]

    # aを表示

    print(a)
    # これコピペしてそのまま貼れば出てきます。
    # binance apiはアクセスに気をつけて....

Noteでも公開中! <a href="https://note.mu/busibase/n/nc9c310fd921c">こちらから</a>