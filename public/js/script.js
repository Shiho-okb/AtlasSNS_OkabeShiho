// モーダル画面
$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 「var post =」はphpで例えると「$post = 」と同じ意味
    // 押されたボタンから投稿内容(post属性の値)を取得し変数(var post)へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);

    // モーダルformタグのaction属性に投稿編集用のURLを設定する
    $('#modal-form').attr('action', '/post/' + post_id + '/edit');

    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});


$(function () {
  console.log("do");

  $('.accordion-button').click(function () {
    // アコーディオンメニューをトグル（切り替え）
    $('nav ul').slideToggle();

    // 矢印の上下反転
    $('.accordion-button').toggleClass('open');
  });
});


$(function () {
  // ファイル選択ボタンがクリックされたとき
  $('#fileSelect').on('click', function (e) {
    e.preventDefault(); // デフォルトのボタン動作を無効化
    $('#fileElem').click(); // 非表示のfile inputをトリガー
  });

  // ファイルが選択されたとき
  $('#fileElem').on('change', function () {
    const file = this.files[0]; // 選択されたファイルを取得
    if (file) {
      $('#fileSelect').text(file.name); // ボタンの文字をファイル名に変更
    } else {
      $('#fileSelect').text('ファイルを選択'); // 初期メッセージに戻す
    }
  });
});
