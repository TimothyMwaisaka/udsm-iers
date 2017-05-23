/**
 * Created by Timothy Mwaisaka on 23/05/2017.
 */
var table = document.getElementsByTagName('table')[0],
    rows = table.getElementsByTagName('tr'),
    text = 'textContent' in document ? 'textContent' : 'innerText';
console.log(text);
for (var i = 1, len = rows.length; i < len; i++){
    rows[i].children[0][text] = i + rows[i].children[0][text];
}