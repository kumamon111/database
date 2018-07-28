---
title: twitterアンフォローを一瞬で
date: 2018-07-14
categories: [ "プログラミング" ]
tags: [ "プログラミング", "javascript", "twitter", "アンフォロー", "一瞬" ]
description: twitterのアンフォローを一瞬で行う方法！
---

# twitter unfollow code

   javascript:(function(){var $followElem=$('.following .js-follow-btn');var followElemCount=$followElem.length;var currentNum=0;var manager=function(){if(currentNum<followElemCount){performer($followElem.eq(currentNum));currentNum+=1;}else{alert('完了！');}};var performer=function($elem){var rand=(Math.floor(Math.random()*1000))+100;setTimeout(function(){$elem.trigger('click');manager();},rand);};manager();})();


このコードをコンソールに入力するだけ。

参照元は、<a href="http://haisai.info/archives/post_273.html">こちら</a>