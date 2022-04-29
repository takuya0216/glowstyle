wp.domReady(function () {

  //テーブルブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/heading', {
    name: 'vertical-text',
    label: '縦書きスタイル'
  });
  //テーブルブロック:.is-style-nameをcssで設定する
  wp.blocks.registerBlockStyle('core/paragraph', {
    name: 'sale-attention',
    label: 'セールボーダースタイル'
  });

});
