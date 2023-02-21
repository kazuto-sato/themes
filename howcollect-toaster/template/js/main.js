jQuery(function(){
  //新着のスライド
  jQuery('.main-upper-wrap').slick({
        autoplay: true,       //自動再生
        slidesToShow: 5,      //表示する数
        slidesToScroll: 1,    //スクロールする枚数
        autoplaySpeed: 10000,  //自動再生のスピード
        speed: 1200,           //スライドするスピード
        arrows: false,         //左右の矢印
        infinite: true,       //永久にループさせる
        pauseOnHover:true,   //マウスホバーしたらスライド停止
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
    });
    
    //プロフィールページのスライド
    jQuery('.own-document-wrap').slick({
      autoplay: true,       //自動再生
      slidesToShow: 5,      //表示する数
      slidesToScroll: 1,    //スクロールする枚数
      autoplaySpeed: 8000,  //自動再生のスピード
      speed: 1200,           //スライドするスピード
      arrows: false,         //左右の矢印
      infinite: true,       //永久にループさせる
      pauseOnHover:true,   //マウスホバーしたらスライド停止
      responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
  });    
　//ハンバーガーメニュー
jQuery('.humburgar').on('click',function(){
  jQuery(".side-nav").toggleClass("is-active");
  jQuery('.main-content-wrap,.archive-content-wrap,.column-content-wrap,.member-content-wrap,.single-page-wrap').on('click',function(){
    jQuery(".side-nav").removeClass("is-active");
    })
  });
  //トップアイコン
  jQuery('.home-profile-btn').on('click',function(){
    jQuery(this).toggleClass("is-active");
  });
 
  
  //h２取得してスタイル適用
  jQuery(function(){
    jQuery('h2').each(function(i){
      jQuery(this).attr('id','list-' + (i+1));
    });
  });
  //本文のh2を取得する
  let myClass = document.querySelectorAll(".receipe-content-wrap");
  for (let i = 0; i < myClass.length; i++) {
    let myHeadings = myClass[i].querySelectorAll("h2"); 
    for (let j = 0; j < myHeadings.length; j++) {
      let headline = myHeadings[j].innerText;//h2の内容はheadlineに入っている
      //.outline(ul)にlistとして追加する
      let heading_items = jQuery("<li class='outline-list'><a href='#list-"+(j+1)+ "'>"+"<span>"+ (j+1) + "</span>" +headline+"</a></li>");
      jQuery(".outline").append(heading_items); // ul要素に新しいli要素を追加する
       
    }
  }
   //アンカーリンクからのページ内スクロール
   jQuery('a[href^="#"]').on('click',function(){
    var adjust = -60;
    var speed = 400;
    var href= jQuery(this).attr("href");
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top + adjust;
    jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });  
    
  

});