document.getElementById('copyButton').addEventListener('click', async function () {
    const resultTextarea = document.getElementById('resultTextarea');
    try {
        await navigator.clipboard.writeText(resultTextarea.value);
        alert('テキストがコピーされました');
    } catch (err) {
        console.error('テキストのコピーに失敗しました:', err);
        alert('テキストのコピーに失敗しました');
    }
});
