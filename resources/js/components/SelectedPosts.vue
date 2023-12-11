<template>
    <div class="row">
        <!-- Лівий блок для вибору постів -->
        <div class="left-block col-md-6">
            <div class="input-group">
                <input type="text" v-model="searchText" placeholder="Пошук...">

                <span class="found-count" v-if="!isSearching">{{ allCompanies.length }} знайдено</span>
            </div>
            <ul id="companies-list" class="companies-list list-group mb-3">
                <li class="list-group-item pl-5" v-for="company in displayedItems" :key="company.id">
                    <input class="form-check-input" id="company_{{ company.id }}" type="checkbox"
                           :checked="isCompanySelectedLeft(company.id)"
                           @change="toggleCompanySelection(company.id)">
                    {{ getCompanyTitleById(company.id) }}
                </li>
            </ul>
            <nav aria-label="Page navigation" v-if="allCompanies.length > this.itemsPerPage">

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
                <li class="list-group-item d-flex" v-for="companyId in selectedCompaniesRight" :key="companyId"
                    :value="companyId">
                    <input type="hidden" name="related_companies[]" :value="companyId">
                    {{ getCompanyTitleById(companyId) }}
                    <button class="ml-auto align-items-center btn btn-default" @click="unselectCompany(companyId)">X
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>

export default {
    name: 'Related Companies',

    data() {
        return {
            allCompanies: [], // Додайте цей масив
            companies: [],          // Усі пости
            n: 0,
            active: 0,
            selectedCompaniesLeft: [],  // Окрема змінна для вибраних компаній у лівому блоку
            selectedCompaniesRight: [],  // Окрема змінна для вибраних компаній у правому блоку
            searchText: "",     // Текст пошуку
            itemsPerPage: 25,         // Кількість елементів на сторінці
            count: 25,         // Кількість елементів на сторінці
            currentPage: 1,           // Поточна сторінка
            blockedCompanies: [],     // Блоковані компанії
            isLoading: true,
            isSearching: false,  // Додайте цю змінну
            totalPages: 1,
            filteredCompaniesObject: {
                companies: [], // Вміст фільтрованих компаній
                currentPage: 1, // Поточна сторінка
                itemsPerPage: 25, // Кількість елементів на сторінці
            },
        };
    },

    computed: {
        filteredCompanies() {
            if (!this.allCompanies) {
                return []; // Повертаємо пустий масив, якщо дані ще не завантажені
            } else {
                return this.allCompanies.filter(company => {
                    return company.title_company.includes(this.searchText);
                });
            }
        },
        foundCompaniesCount() {
            return this.allCompanies.length;
        },
        paginatedCompanies() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.displayedItems.slice(start, end);
        },
        displayedItems() {
            const start = this.active * this.count;
            const end = start + this.count;
            return this.allCompanies.slice(start, end);
        },

        pageCount() {
            return Math.ceil(this.allCompanies.length / this.count);
        },
        offset: function () {
            return this.currentPage * this.itemsPerPage;
        },
        length: function () {
            return Math.ceil(this.allCompanies.length / this.count);
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
        getCompanyTitleById(companyId) {
            const company = this.allCompanies.find(company => company.id === companyId);
            if (company) {
                const isBlocked = this.blockedCompanies.includes(companyId);
                company.selected = this.selectedCompaniesLeft.includes(companyId); // Оновлення статусу вибраної компанії

                // Обрізати заголовок до 50 символів (можете вибрати іншу довжину)
                const truncatedTitle = company.title_company.slice(0, 50);

                return `${truncatedTitle} (${isBlocked ? 'Заблоковано' : 'Активний'})`;
            }
            return "";
        },

        isCompanySelectedLeft(companyId) {
            return this.selectedCompaniesLeft.includes(companyId);
        },

        isCompanySelectedRight(companyId) {
            return this.selectedCompaniesRight.includes(companyId);
        },

        toggleCompanySelection(companyId) {
            if (this.isCompanySelectedLeft(companyId)) {
                this.unselectCompany(companyId);
            } else {
                this.selectCompany(companyId);
            }
        },

        selectCompany(companyId) {
            if (!this.isCompanySelectedLeft(companyId)) {
                this.selectedCompaniesLeft.push(companyId);
            }
            if (!this.isCompanySelectedRight(companyId)) {
                this.selectedCompaniesRight.push(companyId);
            }
            // Оновлення статусу компанії в об'єкті companies
            const company = this.allCompanies.find(company => company.id === companyId);
            if (company) {
                company.selected = true;
            }
        },

        unselectCompany(companyId) {
            if (this.isCompanySelectedLeft(companyId)) {
                const indexLeft = this.selectedCompaniesLeft.indexOf(companyId);
                this.selectedCompaniesLeft.splice(indexLeft, 1);
            }
            if (this.isCompanySelectedRight(companyId)) {
                const indexRight = this.selectedCompaniesRight.indexOf(companyId);
                this.selectedCompaniesRight.splice(indexRight, 1);
            }
            // Оновлення статусу компанії в об'єкті companies
            const company = this.companies.find(company => company.id === companyId);
            if (company) {
                company.selected = false;
            }
        },
        // fetchCompanies() {
        //     this.isSearching = true;  // Встановіть значення isSearching перед відправкою запиту
        //
        //     axios.get('http://24city-laravel/api/companies_2') // Ваш маршрут для отримання компаній
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

            api_url = api_url || '/api/companies_1';
            fetch(api_url)
                .then(response => response.json())
                .then(response => {
                    this.companies = response.data;
                })
                .catch(err => console.log(err));
        },
        async fetchCompanies(api_url = '/api/companies_1') {
            this.isLoading = true;

            try {
                while (this.currentPage <= this.totalPages) {
                    const response = await fetch(`${api_url}?page=${this.currentPage}`);

                    if (!response.ok) {
                        throw new Error("Network response was not ok");
                    }

                    const data = await response.json();

                    this.allCompanies = [...this.allCompanies, ...data.data];
                    this.totalPages = data.last_page;
                    this.currentPage++;
                }

                // Оновлення filteredCompanies як усі отримані та відфільтровані компанії
                this.$nextTick(() => {
                    this.filteredCompanies = [...this.allCompanies];
                });
            } catch (error) {
                console.error("Error fetching data:", error);
            } finally {
                this.isLoading = false;
            }
        },
        update: function (n) {
            this.active = n;
            this.$emit('page-item', this.active); // Відправити подію до батьківського компонента
        }
    },
    mounted() {
        //this.getPosts();
        this.fetchCompanies()
    },

};
</script>

<style scoped>

</style>
