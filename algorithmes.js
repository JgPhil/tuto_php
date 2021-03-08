//1 Ecrire un algorithme permettant de trier un tableau de chaines de caractères.

let arr = ['test2', 'test1', 'test3', 'btest', 'atest'];
arr.slice().sort((a, b) => {
    return a > b;
})
console.log(arr);


//2 Ecrire un algorithme permettant d’insérer une chaine de caractères au bon endroit dans un
//tableau trié par ordre croissant.

let array = ['test2', 'test1', 'test3', 'btest', 'atest'];

const insertInArray = (arr, str) => {
    for (let i = 0; i < arr.length; i++) {
        if (str > arr[i]) {
            arr.splice(i, 0, str);
            break;
        }
    }
    console.log(arr);
}

insertInArray(arr, 'ctest');

let regex = /Père/;
let sttToSearch = 'Mon Père, ma Mère, mes frères et mes soeurs';
let result = regex.test(sttToSearch);
console.log(result);


//4 Ecrire un algo qui permet de retourner la somme, la moyenne, le min et le max d’un tableau de
// nombre

let nbrs = [1, 2, 3, 4, 5, 6, 7, 8, 9];

const calculateAll = (nbrs) => {
    let sum = nbrs.reduce((acum, item) => acum + item);
    let min = Math.min(...nbrs);
    let average = sum / nbrs.length;
    let max = Math.max(...nbrs);
    return  "Somme:" + sum + ",  Min:" + min + ",  Moyenne:" + min + ",  Max:" + max;
}

console.log(calculateAll(nbrs))