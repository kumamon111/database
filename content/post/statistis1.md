---
title: 統計Rを使った分析（１）
date: 2017-09-30
draft: true
categories: [ "statistics" ]
tags: [ "R", "金融", "トレンド" ]
description: 今後ビックデータの発展によってますます期待が高まる未来予測。その中で最も不確実性の高い（私が知る中では）為替・株式相場の分析を行っていきたいと思います。この件に関しましては全くのビギナーでありますので、学習したことをつらつら綴るような記事にはなると思いますが、同じような志を持つ学生とともに作り上げ、将来につなげていければと思います。
---

今後ビックデータの発展によってますます期待が高まる未来予測。その中で最も不確実性の高い（私が知る中では）為替・株式相場の分析を行っていきたいと思います。この件に関しましては全くのビギナーでありますので、学習したことをつらつら綴るような記事にはなると思いますが、同じような志を持つ学生とともに作り上げ、将来につなげていければと思います。

今回はまず、今後の統計にあたって必要なコマンドを紹介していきます。


スカラー平均

    mean

ベクトル平均

    ave

分散

    mean((x-ave(x)^2)

標準偏差

    √mean((x-ave(x)^2)

不偏分散    

    var

不偏標準偏差

    sd

確率分布の乱数発生

    rnome(10)
    rnome(100)
    rnome(1000)

()内は数