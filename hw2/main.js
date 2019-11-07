//функция отправки запроса, получения и записи ответа от сервера
function getResult(url, result) {
  fetch(url)
  .then (response => response.text())
  .then (data => result.innerHTML = data)
}


document.querySelectorAll('input[type="submit"]').forEach(el => {
  el.addEventListener('click', (event) => {
    event.preventDefault()
    let id = +event.target.dataset.id
    let result = document.querySelector('.result' + id)
    console.log(`Задача №${id}`)
    switch (id) {
      case 1: {
        let a = document.querySelector('#input1_1').value
        let b = document.querySelector('#input1_2').value
        let url = `functions.php?id=${id}&a=${a}&b=${b}`
        if ((a !== '') && (b !== '')) {
          getResult(url, result)
        }
        else alert('Заполните все поля!')
        break
      }
      case 2: {
        let a = document.querySelector('#input2_1').value
        let url = `functions.php?id=${id}&a=${a}`
        if ((a !== '')) {
          getResult(url, result)
        }
        else alert('Заполните все поля!')
        break
      }
      case 3: {
        let a = document.querySelector('#input3_1').value
        let op = document.querySelector('#input3_2').value
        let b = document.querySelector('#input3_3').value
        let url = `functions.php?id=${id}&a=${a}&op=${op}&b=${b}`
        if ((a !== '') && (b !== ''))  {
          getResult(url, result)
        }
        else alert('Заполните все поля!')
        break
      }
      case 6: {
        let val = document.querySelector('#input6_1').value
        let pow = document.querySelector('#input6_2').value
        let url = `functions.php?id=${id}&val=${val}&pow=${pow}`
        if ((val !== '') && (pow !== ''))  {
          getResult(url, result)
        }
        else alert('Заполните все поля!')
        break
      }
      case 7: {
        let url = `functions.php?id=${id}`
        getResult(url, result)
        break
      }
    }
  })
})
