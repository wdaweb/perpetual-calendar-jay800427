# 建議事項

1. 目錄下的主要檔案或第一個要執行的檔案儘量以index.php或index.html來命名
2. 儘量使用相對路徑來取代絕對路徑
```
  <a href="homework.php?month=......
    改成
  <a href="?month=.....
```
3. `#square`的原始DIV佔住了BODY最上面的50px高度，建議改成`position:absolute`讓動畫的元件不會佔住頁面的空間
4. 動畫的移動位置可以調整為百分比的方式來對應，使用固定數字的話，當瀏灠器的寬度改變時，動畫會跑出視窗
