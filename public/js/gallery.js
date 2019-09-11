/**
 * @class Gallery обеспечивает работу галереи. В нем используются четыре метода:
 * @method _addListeners вешает обработчики событий на каждую картинку галереи,
 * а также на модальное окно. Передает события методам _clickedImage и _closeImage
 * 
 * @method _clickedImage пишет в HTML модального онца картинку и включает
 * отображение модального окна. После этого метод запускает метод _makeCenter
 * 
 * @method _makeCenter выравнивает отображаемое в модальном окне изображение по
 * горизонтали и по вертикали. Затем запускается метод _counter
 * 
 * @method _counter создает cookie, в который значение записывается в виде
 * JSON-строки {"pic_id": "id", "curr_num": "views"}. Cookie уничтожается после
 * закрытия браузера
 * 
 * @method _closeImage выключает отображение модального окна при клике по нему в
 * любом месте
 */
class Gallery {
    constructor () {
        this.links = document.querySelectorAll(".galleryPic")
        this.window = document.querySelector(".modalWindow")
        this._addListeners()
    }

    _addListeners () {
        this.links.forEach(link => link.addEventListener("click", this._clickedImage.bind(this)))
        this.window.addEventListener("click", this._closeImage.bind(this))
    }

    _clickedImage () {
        this.imageLink = [
            event.target.src,
            event.target.alt
        ]
        this.window.innerHTML = `<img src="${this.imageLink[0]}" alt="${this.imageLink[1]}" class="modalImage">`
        this.window.style.display = "inline"
        this._makeCenter(event.target.parentNode)
    }

    _makeCenter (data) {
        this.image = this.window.querySelector(".modalImage")
        this.height = this.image.offsetHeight
        this.width = this.image.offsetWidth
        this.image.style.marginTop = - this.height / 2 + "px"
        this.image.style.marginLeft = - this.width / 2 + "px"
        this._counter(data)
    }

    _closeImage () {
        this.window.style.display = "none"
    }

    // Не работает. Пошел путем куков
    //
    // _counter (data) {
    //     this.views = data.querySelector(".counter")
    //     fetch("engine/post.php", { 
    //         method: "POST",
    //         body: "toServer=" + data.dataset.id,   
    //         headers:{"content-type": "application/x-www-form-urlencoded"} 
    //         })
           
    //     .then( (response) => {
    //             if (response.status !== 200) {           
    //                 return Promise.reject();
    //             }   
    //     return response.text()
    //     })
    //     .then(res => this.views.innerHTML = parseInt (this.views.innerHTML) + 1)
    //     .catch(() => console.log("Nope")); 
    // }

    _counter (data) {
        this.views = data.querySelector(".counter")
        this.views.innerHTML = parseInt (this.views.innerHTML) + 1
        this.cookieData = JSON.stringify ({pic_id: data.dataset.id, curr_count: this.views.innerHTML})
        document.cookie = `pic_viewed = ${this.cookieData}; path=/`
    }
}

let gallery = new Gallery ();