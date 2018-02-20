---
title: 初心者でも自分のホームページを簡単に作成する方法
categories: [ "エンジニアリング" ]
date: 2017-12-01
tags: [ "hugo", "IT", "プログラミング", "HP", "アフィリエイト"]
description: 副業が話題となってきた昨今、収入源の一つとして代表的な広告収入。しかし、最も収益性の高いグーグルアドセンスは独自ドメインのサイトでなければ登録ができません。また、独自ドメインをとるには、独自サイトを立ち上げる必要があり（yahooブログやamebaブログではダメ）そこには莫大な工数がかかってしまいます。そんな独自サイト構築をたった一瞬で完成させる方法を今回はご紹介します。
---


### 副業としての広告ビジネス


副業が話題となってきた昨今、収入源の一つとして代表的な広告収入。


しかし、最も収益性の高いグーグルアドセンスは独自ドメインのサイトでなければ登録ができません。また、独自ドメインをとるには、独自サイトを立ち上げる必要があり（yahooブログやamebaブログではダメ）そこには莫大な工数がかかってしまいます。



そんな独自サイト構築をたった一瞬で完成させる方法を今回はご紹介します。


### HUGOを使い、サイトのフレームワークを簡単に導入

まずターミナルに移動します。Macのパソコンには必ず入っています。

    brew install hugo 

    hugo new site ファイル名(好きなようにどうぞ)

    cd ファイル名

    git init

* brewが見つかりませんと出た場合は<a href="https://qiita.com/is0me/items/475fdbc4d770534f9ef1">こちら</a>
* gitが見つからない場合は"gitをインストールしますか"と出るので、手順に従いインストールしてください。

<a href="https://themes.gohugo.io/">https://themes.gohugo.io/</a>に移動し、使いたいテーマを選択する。


"Download"を押し、githubのサイトに移動したら右の緑のボタン"clone or download"をクリック。


その中の、アドレスをコピー


ターミナルに戻り、

    cd themes
    
    git clone 先ほどコピーしたアドレス

    ex. git clone https://github.com/cboettig/hugo-now-ui.git

ここでサイトが出来上がっているか、ローカル環境で確認します。

    hugo server -t テーマ名
    ex. hugo server -t hugo-now-ui

と打つと、最後の方に"localhost:1313"というURLが出てくると思います。


それをインターネットのアドレスバーから検索してください。


確認できたらターミナルを閉じます。閉じる前に、"control+C"でローカル環境を閉じてください。


### ネット上にあげるまで

このプロセスが知りたい方は<a href="/service/service/">こちら</a>へ。