// 入力ボックスの要素と文字数表示用の要素を取得
const inputBox = document.getElementById('name');
const charCount = document.getElementById('count');
const maxLength = 50; // 最大文字数を設定
// 入力が変更された時に文字数を更新
inputBox.addEventListener('input', function() {
    const currentLength = inputBox.value.length; // 現在の文字数を取得
    charCount.textContent = '現在' + currentLength + '文字'; // 文字数を表示
    if (currentLength > maxLength) {
        // 最大文字数を超えた場合、入力ボックスを制限
        inputBox.value = inputBox.value.slice(0, maxLength);
        charCount.style.color = 'red'; // 文字数表示を赤に変更
        charCount.textContent = maxLength + '文字を超えました'; // 文字数を表示
    } else {
        charCount.style.color = 'black'; // 文字数表示を黒に戻す
    }
});