---
title: 今更だけどルンバってどうやって動いてるの。本当にすごいSLAM技術。
date: 2018-02-20
categories: [ "テクノロジー" ]
tags: [ "SLAM", "ドローン", "AI" ]
description: 家庭から宇宙にまで応用されるSLAM技術を徹底解説
---


### ルンバはなぜ自動で障害物を回避できるのか

ルンバには、SLAM(Simultaneous Localization and Mapping)という技術が導入されています。
 
    SLAMとは、カメラなどを用いて自己位置推定と周囲環境のマッピングを同時に行うこと

シンプルに言えば、カメラセンサーからのデータをもとに、「自分が今どんな姿勢でどこにいるのか」と「周囲の環境を把握すること」この２つを同時に行います。

iRobot has been developing robots with wireless integration along with intelligent navigation capability based on SLAM.

    SLAM is a way of dynamically building a map while keeping track of your own position at the same time.


</br>

### 宇宙ロボットやドローンにも応用されている

この技術は、自律型ロボットやドローンを動かす上では現在最も主要な技術です。

理由の1つに、非GPS環境での優位性があげられます。ドローンやロボットが活躍する場といえば、人が入れないところというのが最も先に浮かぶものです。

そういった場所で、電波が必ずしも通るとは限りません。宇宙では特に、GPSによる自己位置の特定に困難を伴います。

SLAMはGPSを使わずに、カメラから得た情報によって自己の位置を特定し、かつ周囲環境のマッピングを行うため、どのような環境でも安全に飛行させることができます。

SLAM is the major technology that is implemented in autonomous drones and robotics.


</br>

### でも具体的にどうやって行うの？

ここからは少し複雑です。ドローンへの実装に一番精通があるので、このあとはドローンを主題に話に進めます。

ドローンでは、PTAM (parallel tracking and mapping)というSLAMライブラリを使用します。

PTAMでは、トラッキング（自己位置の特定）とマッピング（環境地図の作成）を同時に行います。

I am familir with the implementation in drone so I will pick up the case of Drone.

Drone engineers are now using PTAM which is one of the library of SLAM.

PTAM excutes both tracking and mapping. 

</br>

#### トラッキング

カメラ画像から特徴点というものを抽出します。特徴点とは物体を認識するのに必要な目印のようなものです。

また、フレームごとの姿勢変化をもとに、大雑把な姿勢の推定を得ます。その後、姿勢の推定に対して、6次元ベクトルで合成変換。

その合成変換とカメラ投影モデルにより、環境地図中の特徴点がに2次元画像中へ投影。

この2つの特徴点の、誤差の総和が小さくなるような値が出力するのがトラッキングです。

簡単に言いすぎましたが、詳細はこちらの<a href="https://kaigi.org/jsai/webprogram/2014/pdf/269.pdf">リサーチペーパー</a>をご覧ください。


</br>

#### マッピング

5点アルゴリズムによる初期化後、初期マップを作成。

Trackingによるキーフレームの追加によって、特徴点を三角法によりマッピングする。

<iframe width="80%" height="409" src="https://www.youtube.com/embed/NMFsEpVppZM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

参照: http://www.morphoinc.com/technology/vslam
</br>
参照: https://kaigi.org/jsai/webprogram/2014/pdf/269.pdf

<script type="text/javascript">amzn_assoc_ad_type ="responsive_search_widget"; amzn_assoc_tracking_id ="kumamon10a-22"; amzn_assoc_marketplace ="amazon"; amzn_assoc_region ="JP"; amzn_assoc_placement =""; amzn_assoc_search_type = "search_widget";amzn_assoc_width ="auto"; amzn_assoc_height ="auto"; amzn_assoc_default_search_category =""; amzn_assoc_default_search_key ="SLAM";amzn_assoc_theme ="light"; amzn_assoc_bg_color ="FFFFFF"; </script><script src="//z-fe.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&Operation=GetScript&ID=OneJS&WS=1&Marketplace=JP"></script>

