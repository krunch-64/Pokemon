var mininavArrow = 0;
const mininavArrowBtn = document.getElementById('mininav-arrow');
const mininav2 = document.getElementById('mininav2');
const listItemCard = document.querySelector('.list-item-card');
const searchBars = document.querySelectorAll(".search-bar");

// ---------------------------------------------------------------------------

var listItem = [
    {
        name:'Livre',
        nb:0,
        image:'choice-object-0.svg',
        lenght:11,
        widht:18,
        height:3,
    },
    {
        name:'Carton standard',
        nb:0,
        image:'choice-object-1.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Télévision',
        nb:0,
        image:'choice-object-2.svg',
        lenght:50,
        widht:90,
        height:5,
    },
    {
        name:'Chaise',
        nb:0,
        image:'choice-object-3.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Machine à laver',
        nb:0,
        image:'choice-object-4.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Cube 1m de côté',
        nb:0,
        image:'choice-object-5.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Réfrigérateur',
        nb:0,
        image:'choice-object-6.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Lit simple',
        nb:0,
        image:'choice-object-7.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Vélo',
        nb:0,
        image:'choice-object-8.svg',
        lenght:55,
        widht:35,
        height:30,
    },
    {
        name:'Carton standard',
        nb:0,
        image:'choice-object-9.svg',
        lenght:55,
        widht:35,
        height:30,
    },


    // {
    //     title:"TV",
    //     length:"50",
    //     height:"90",
    //     widht:"5",
    // },
    // {
    //     title:"Chaise",
    //     length:"50",
    //     height:"60",
    //     widht:"45",
    // },
    // {
    //     title:"Machine à laver",
    //     length:"60",
    //     height:"85",
    //     widht:"55",
    // },
    // {
    //     title:"Cube 1m de coté",
    //     length:"100",
    //     height:"100",
    //     widht:"100",
    // },
    // {
    //     title:"Réfrigérateur",
    //     length:"85",
    //     height:"125",
    //     widht:"60",
    // },
    // {
    //     title:"Lit simple",
    //     length:"190",
    //     height:"55",
    //     widht:"100",
    // },
    // {
    //     title:"Vélo",
    //     length:"185",
    //     height:"105",
    //     widht:"65",
    // },
    // {
    //     title:"Table",
    //     length:"150",
    //     height:"75",
    //     widht:"120",
    // },
    // {
    //     title:"Armoire",
    //     length:"110",
    //     height:"190",
    //     widht:"60",
    // },
    // {
    //     title:"Bibliothèque",
    //     length:"80",
    //     height:"230",
    //     widht:"25",
    // },
    // {
    //     title:"Canapé",
    //     length:"165",
    //     height:"90",
    //     widht:"90",
    // },
    // {
    //     title:"Lit double",
    //     length:"190",
    //     height:"55",
    //     widht:"200",
    // }
    
];

function getVolume (listItemTest) {
        var ItemTestVolumeString = 0;
        for (var ItemTest of listItemTest) {
            ItemTestVolumeString += ItemTest['nb']*ItemTest['lenght']*ItemTest['widht']*ItemTest['height'];
    }
    return ItemTestVolumeString;
}
function getDivision (volumeTest) {
    var tabToResult = {
        s:0,
        m:0,
        l:0,
        xl:0
    };
    if (volumeTest >= 26000000) {
        tabToResult['xl'] = Math.floor(volumeTest/26000000);
        volumeTest -= Math.floor(volumeTest/26000000) * 26000000; 
    } 
    if (volumeTest < 26000000 && volumeTest > 16000000) {
        tabToResult['xl'] += 1;
        volumeTest = 0;
    } 
    if (volumeTest >= 16000000) {
        tabToResult['l'] = Math.floor(volumeTest/16000000);
        volumeTest -= Math.floor(volumeTest/16000000) * 16000000;
    } 
    if (volumeTest < 16000000 && volumeTest > 9000000) {
        tabToResult['l'] += 1;
        volumeTest = 0;
    } 
    if (volumeTest >= 9000000) {
        tabToResult['m'] = Math.floor(volumeTest/9000000);
        volumeTest -= Math.floor(volumeTest/9000000) * 9000000;
    } 
    if (volumeTest < 9000000 && volumeTest > 5000000) {
        tabToResult['m'] += 1;
        volumeTest = 0;
    } 
    if (volumeTest >= 5000000) {
        tabToResult['s'] = Math.floor(volumeTest/5000000);
        volumeTest -= Math.floor(volumeTest/5000000) * 5000000;
    } 
    if (volumeTest < 5000000 && volumeTest > 0) {
        tabToResult['s'] += 1;
        volumeTest = 0;
    }
    return tabToResult;
}
function getPrice (tabToResultTest = Array) {
    return tabToResultTest['xl'] * 200 + tabToResultTest['l'] * 140 + tabToResultTest['m'] * 80 + tabToResultTest['s'] * 50
}

setInterval(function() {
    document.getElementById('s-p').textContent = getDivision(getVolume (listItem))['s'];
    document.getElementById('m-p').textContent = getDivision(getVolume (listItem))['m'];
    document.getElementById('l-p').textContent = getDivision(getVolume (listItem))['l'];
    document.getElementById('xl-p').textContent = getDivision(getVolume (listItem))['xl'];

    document.getElementById('result-p').textContent = getPrice (getDivision (getVolume (listItem)))+`.00 euros`;

}, 100);
// ---------------------------------------------------------------------------
function miniNavFunction () {
    mininavArrowBtn.addEventListener("click", function(){
        if (mininavArrow == 2) {
            mininavArrow = 1;
            mininavArrowBtn.classList.remove('mininav-arrow-not-select');
            mininavArrowBtn.classList.add('mininav-arrow-select');
            mininav2.classList.remove('mininav2-base');
            mininav2.classList.remove('mininav2-close');
            mininav2.classList.add('mininav2-open');
        } else {
            mininavArrow = 2;
            mininavArrowBtn.classList.remove('mininav-arrow-select');
            mininavArrowBtn.classList.add('mininav-arrow-not-select');
            mininav2.classList.remove('mininav2-open');
            mininav2.classList.add('mininav2-close');
        }
    }); 
};
miniNavFunction ();

// ---------------------------------------------------------------------------

// function searchBarFunction () {
//     for (var searchBar of searchBars) {
//         setInterval(function() {
//             if(document.activeElement === searchBar.querySelector('input')) {
//                 searchBar.classList.add('searchbar-dynamic-focus');
//             } else {
//                 searchBar.classList.remove('searchbar-dynamic-focus');
//             }
//             if(searchBar.querySelector('input').value === '') {
//                 searchBar.classList.remove('search-bar-cross-visible');
//                 searchBar.classList.add('search-bar-cross-not-visible');
//             } else {
//                 searchBar.classList.remove('search-bar-cross-not-visible');
//                 searchBar.classList.add('search-bar-cross-visible');
//             }
//         }, 100);
//         searchBar.querySelector('.btn-search-bar').addEventListener("click", function(){
//             // alert(searchBar.querySelector('.search-bar__input').value);
//             searchBar.querySelector('.search-bar__input').value = "";
//         });
//     }
// };
// searchBarFunction ();

// ---------------------------------------------------------------------------

function getAllValueWithAstring(strIfInTab = String, tabTest = Array) {
    tabToFill = [];
    for (itemTabTest of tabTest) {
        var toLowerCase = itemTabTest['name'].toLowerCase()
        if (toLowerCase.includes(strIfInTab.toLowerCase())) {
            tabToFill.push(itemTabTest['name']);
        }
        
    }
    return tabToFill
} 


function putCard (tabsearch) {

    const listItemCard = document.querySelector('.list-item-card');
    var listItemCardToFill = "";

    


    for (var i = 0; i < listItem.length; i++) {

        if (tabsearch.includes(listItem[i]['name']) ) {
            var CardItemToAdd = `<div id="${i}" class="card-item"><div class="card-item__image"><img src=""></div><p class="card-item-p txt-md">Nom de l'objet</p><div class="card-item__select align-center"><button id="${i}" class="btn card-item__select--up card-item__select--arrow"><img src="./assets/img/arrow-top-black.svg" alt="" class="card-item-select-arrow-up"></button><p class= "card-item-number">0</p><button id="${i}" class="btn card-item__select--down card-item__select--arrow"><img src="./assets/img/arrow-bottom-black.svg" alt="" class="card-item-select-arrow-down"></button></div></div>`;
            listItemCardToFill += CardItemToAdd;
        }

        
        listItemCard.innerHTML = listItemCardToFill;
    };
};
putCard (getAllValueWithAstring('', listItem));



// document.getElementById("btn-search").addEventListener("click", function() {
//     putCard (getAllValueWithAstring('g', listItem))
// });

// document.getElementById("btn-search").addEventListener("click", function() {

// });



// ---------------------------------------------------------------------------

// setInterval(function() {
//     const resultSearchBarCard = document.getElementById('searchbar-card-item').value;
//     if (stringControlSearchBar != resultSearchBarCard) {
//         if (resultSearchBarCard == "") {

//         } else {
//         }
//     }
//     stringControlSearchBar = resultSearchBarCard;
// }, 1000);

// var page = 1;
// const itemspage1 = document.querySelectorAll('.page1');
// const itemspage2 = document.querySelectorAll('.page2');

// setInterval(function() {
//     if (page == 1) {
//         for (var item of itemspage2) {
//             item.classList.add('d-none');
//         }
//         for (var item of itemspage1) {
//             item.classList.remove('d-none');
//         }
//     } else if (page == 2) {
//         for (var item of itemspage1) {
//             item.classList.add('d-none');
            
//         }
//         for (var item of itemspage2) {
//             item.classList.remove('d-none');
//         }
//     }
// }, 100);

var tabChoiceObject = 
[
    {
        title:"Livre",
        length:"11",
        height:"18",
        widht:"3",
    },
    {
        title:"Carton standard",
        length:"55",
        height:"35",
        widht:"30",
    },
    {
        title:"TV",
        length:"50",
        height:"90",
        widht:"5",
    },
    {
        title:"Chaise",
        length:"50",
        height:"60",
        widht:"45",
    },
    {
        title:"Machine à laver",
        length:"60",
        height:"85",
        widht:"55",
    },
    {
        title:"Cube 1m de coté",
        length:"100",
        height:"100",
        widht:"100",
    },
    {
        title:"Réfrigérateur",
        length:"85",
        height:"125",
        widht:"60",
    },
    {
        title:"Lit simple",
        length:"190",
        height:"55",
        widht:"100",
    },
    {
        title:"Vélo",
        length:"185",
        height:"105",
        widht:"65",
    },
    {
        title:"Table",
        length:"150",
        height:"75",
        widht:"120",
    },
    {
        title:"Armoire",
        length:"110",
        height:"190",
        widht:"60",
    },
    {
        title:"Bibliothèque",
        length:"80",
        height:"230",
        widht:"25",
    },
    {
        title:"Canapé",
        length:"165",
        height:"90",
        widht:"90",
    },
    {
        title:"Lit double",
        length:"190",
        height:"55",
        widht:"200",
    }
];

// setInterval(function() {
//     var valueRangeObject = document.querySelector('#choice-object').querySelector('input').value;
//     var imgChoiceObject = `./assets/img/choice-object-${valueRangeObject}.svg`;
//     var pChoiceObject = 
//     `${tabChoiceObject[valueRangeObject]['length']} x 
//     ${tabChoiceObject[valueRangeObject]['height']} x
//     ${tabChoiceObject[valueRangeObject]['widht']}cm
//     `;
//     var h2ChoiceObject = tabChoiceObject[valueRangeObject]['title'];

//     document.querySelector('#choice-object').querySelector('img').src = imgChoiceObject;
//     document.querySelector('#choice-object').querySelector('p').textContent = pChoiceObject;
//     document.querySelector('#choice-object').querySelector('h2').textContent = h2ChoiceObject;
// }, 100);

const itemsCard = document.querySelectorAll('.card-item');

for (var itemCard of itemsCard) {
    itemCard.querySelector('.card-item__select--up').addEventListener("click", function() {

        listItem[this.id]['nb'] += 1;
    })
    itemCard.querySelector('.card-item__select--down').addEventListener("click", function() {
        if (listItem[this.id]['nb'] > 0) {
            listItem[this.id]['nb'] -= 1;
        }
    })
};

setInterval(function() {
    for (var itemCard of itemsCard) {
        itemCard.querySelector('.card-item-number').textContent = listItem[itemCard.id]['nb'];
    };
}, 100);

for (var itemCard of itemsCard) {
    itemCard.querySelector('.card-item-p').textContent = listItem[itemCard.id]['name'];
    itemCard.querySelector('.card-item img').src = `./assets/img/${listItem[itemCard.id]['image']}`;
};

// var stringControlSearchBar = "test";

// document.querySelector('.navbar2__plus').addEventListener("click", function() {
//     page = 2;
// })


