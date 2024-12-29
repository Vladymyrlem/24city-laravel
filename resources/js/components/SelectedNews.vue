<template>
    <div class="row">
        <!-- Лівий блок для вибору постів -->
        <div class="left-block col-md-6">
            <div class="input-group">
                <input type="text" v-model="searchText" placeholder="Пошук...">

                <span class="found-count" v-if="!isSearching">{{ filteredNews.length }} знайдено</span>
            </div>
            <ul id="news-list" class="news-list list-group mb-3">
                <li class="list-group-item pl-5" v-for="news_item in displayedItems" :key="news_item.id">
                    <input class="form-check-input" id="news_item_{{ news_item.id }}" type="checkbox"
                           :checked="isNewsSelectedLeft(news_item.id)"
                           v-model="selectedNewsIds"

                           @change="toggleNewsSelection(news_item.id)">
                    {{ getNewsTitleById(news_item.id) }}
                    <!--                    <label :class="{ selected: isNewsSelectedLeft(news_item.id) }">{{ news_item.title }}</label>-->

                </li>
            </ul>
            <nav aria-label="Page navigation" v-if="filteredNews.length > this.itemsPerPage">

                <ul class="pagination">

                    <li class="page-item" v-if="active > 3 && pageCount > 6">
                        <a class="page-link" href="#" @click.stop.prevent="update(0)">{{ 1 }}</a>
                    </li>

                    <li v-if="active > 3 && pageCount > 6" class="disabled page-item">
                        <a class="page-link" href="#">...</a>
                    </li>

                    <li class="page-item" v-for="n in numbers" :class="{'active' : n === active}">
                        <a class="page-link" href="#" @click.stop.prevent="update(n)">{{ n + 1 }}</a>
                    </li>

                    <li v-if="active < pageCount-4 && pageCount > 6" class="disabled page-item">
                        <a class="page-link" href="#">...</a>
                    </li>

                    <li class="page-item" v-if="active < pageCount-4 && pageCount > 6">
                        <a class="page-link" href="#" @click.stop.prevent="update(pageCount-1)">{{ pageCount }}</a>
                    </li>

                </ul>
            </nav>

        </div>


        <!-- Правий блок для вибраних постів -->
        <div class="right-block col-md-6">
            <h2>Вибрані пости:</h2>
            <ul class="list-group">
                <li class="list-group-item d-flex" v-for="newsItemId in selectedNewsRight" :key="newsItemId" :value="newsItemId">
                    <input type="hidden" name="related_news[]" :value="newsItemId">
                    {{ getNewsTitleById(newsItemId) }}
                    <button class="ml-auto align-items-center btn btn-default" @click="unselectNews(newsItemId)">X</button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Related News',
    data() {
        return {
            news: [],          // Усі пости
            n: 0,
            active: 0,
            selectedNewsLeft: [],  // Окрема змінна для вибраних компаній у лівому блоку
            selectedNewsRight: [],  // Окрема змінна для вибраних компаній у правому блоку
            searchText: "",     // Текст пошуку
            itemsPerPage: 25,         // Кількість елементів на сторінці
            count: 25,         // Кількість елементів на сторінці
            currentPage: 1,           // Поточна сторінка
            blockedNews: [],     // Блоковані компанії
            isLoading: true,
            isSearching: false,  // Додайте цю змінну
            selectedNewsIds: [], // Масив для збереження ідентифікаторів вибраних новин

        };
    },

    computed: {
        filteredNews() {
            if (!this.news) {
                return []; // Повертаємо пустий масив, якщо дані ще не завантажені
            } else {
                return this.news.filter(news => {
                    return news.title.includes(this.searchText);
                });
            }
        },
        foundNewsCount() {
            return this.filteredNews.length;
        },
        paginatedNews() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.displayedItems.slice(start, end);
        },
        displayedItems() {
            const start = this.active * this.count;
            const end = start + this.count;
            return this.filteredNews.slice(start, end);
        },

        pageCount() {
            return Math.ceil(this.filteredNews.length / this.count);
        },
        offset: function () {
            return this.currentPage * this.itemsPerPage;
        },
        length: function () {
            return Math.ceil(this.filteredNews.length / this.count);
        },

        min: function () {
            if (this.active < 6) {
                return 0;
            } else if (this.active > this.length - 7) {
                return this.length - 8;
            } else {
                return this.active - 5;
            }
        },

        max: function () {
            if (this.length < 9) {
                return this.length;
            } else if (this.active < 6) {
                return 8;
            } else if (this.active > this.length - 7) {
                return this.length;
            } else {
                return this.active + 6;
            }
        },

        numbers: function () {
            var temp = [];
            for (var i = this.min; i < this.max; i++) {
                temp.push(i);
            }
            return temp
        },
    },

    events: {
        'page-item': function (page) {
            this.currentPage = page;
        }
    },
    methods: {
        getNewsTitleById(newsItemId) {
            const news = this.news.find(news => news.id === newsItemId);
            if (news) {
                const isBlocked = this.blockedNews.includes(newsItemId);
                news.selected = this.selectedNewsLeft.includes(newsItemId); // Оновлення статусу вибраної компанії

                // Обрізати заголовок до 50 символів (можете вибрати іншу довжину)
                const truncatedTitle = news.title.slice(0, 50);

                return `${truncatedTitle} (${isBlocked ? 'Заблоковано' : 'Активний'})`;
            }
            return "";
        },

        isNewsSelectedLeft(newsItemId) {
            return this.selectedNewsLeft.includes(newsItemId);
        },

        isNewsSelectedRight(newsItemId) {
            return this.selectedNewsRight.includes(newsItemId);
        },

        toggleNewsSelection(newsItemId) {
            if (this.isNewsSelectedLeft(newsItemId)) {
                this.unselectNews(newsItemId);
            } else {
                this.selectNews(newsItemId);
            }
        },

        selectNews(newsItemId) {
            if (!this.isNewsSelectedLeft(newsItemId)) {
                this.selectedNewsLeft.push(newsItemId);
            }
            if (!this.isNewsSelectedRight(newsItemId)) {
                this.selectedNewsRight.push(newsItemId);
            }
            // Оновлення статусу компанії в об'єкті News
            const news = this.news.find(news => news.id === newsItemId);
            if (news) {
                news.selected = true;
            }
        },

        unselectNews(newsItemId) {
            if (this.isNewsSelectedLeft(newsItemId)) {
                const indexLeft = this.selectedNewsLeft.indexOf(newsItemId);
                this.selectedNewsLeft.splice(indexLeft, 1);
            }
            if (this.isNewsSelectedRight(newsItemId)) {
                const indexRight = this.selectedNewsRight.indexOf(newsItemId);
                this.selectedNewsRight.splice(indexRight, 1);
            }
            // Оновлення статусу компанії в об'єкті News
            const news = this.news.find(news => news.id === newsItemId);
            if (news) {
                news.selected = false;
            }
        },
        // fetchCompanies() {
        //     this.isSearching = true;  // Встановіть значення isSearching перед відправкою запиту
        //
        //     axios.get('https://testwork.hudzhal.com.ua/api/companies_2') // Ваш маршрут для отримання компаній
        //         .then(response => {
        //             // Додайте нові пости до вже наявних
        //             this.companies = response.data;
        //
        //         })
        //         .catch(error => {
        //             console.error(error);
        //         });
        // },
        changePage(page) {
            this.currentPage = page;
        },
        getPosts(api_url) {
            this.isSearching = true;  // Встановіть значення isSearching перед відправкою запиту

            api_url = api_url || '/api/news';
            fetch(api_url)
                .then(response => response.json())
                .then(response => {
                    this.news = response.data;
                })
                .catch(err => console.log(err));
        },
        async fetchNews(api_url = '/api/news') {
            this.isSearching = true;  // Встановіть значення isSearching перед відправкою запиту

            try {
                const response = await fetch(api_url);

                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }

                const data = await response.json();
                this.news = data.data;
                console.log(this.news);
                console.log(response);
            } catch (error) {
                console.error("Error fetching data:", error);
            } finally {
                this.isSearching = false;
            }
        },
        update: function (n) {
            this.active = n;
            this.$emit('page-item', this.active); // Відправити подію до батьківського компонента
        }
    },
    mounted() {
        //this.fetchData();
        this.getPosts()
    },

};
</script>

<style scoped>
.selected {
    background-color: #e0e0e0; /* Змініть стиль на ваш смак */
}

</style>
