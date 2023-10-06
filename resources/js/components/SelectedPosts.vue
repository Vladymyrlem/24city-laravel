<template>
    <div>
        <!-- Лівий блок для вибору постів -->
        <div class="left-block">
            <input type="text" v-model="searchText" placeholder="Пошук...">
            <ul id="companies-list" class="companies-list">
                <li v-for="company in filteredCompanies" v-bind:key="company.id">
                    <input type="checkbox" v-model="selectedCompanies" :value="company.id" @click="toggleCompanySelection(company.id)"> {{ getCompanyTitleById(company.id) }}
                </li>
            </ul>
            <div class="page_navigation"></div>

            <!--            <nav aria-label="Page navigation">-->
            <!--                <ul class="pagination">-->
            <!--                    <li class="page-item" v-for="page in pageCount" :key="page">-->
            <!--                        <a class="page-link" @click="changePage(page)">{{ page }}</a>-->
            <!--                    </li>-->
            <!--                </ul>-->
            <!--            </nav>-->

        </div>


        <!-- Правий блок для вибраних постів -->
        <div class="right-block">
            <h2>Вибрані пости:</h2>
            <ul>
                <li v-for="companyId in selectedCompanies" :key="companyId" :value="companyId">
                    <input type="hidden" name="related_companies[]" :value="companyId">
                    {{ getCompanyTitleById(companyId) }}
                </li>
            </ul>
            <!--            <button type="button" @click="saveSelectedPosts">Зберегти</button>-->
        </div>
    </div>
</template>

<script>
import Pagination from './Pagination.vue';

export default {
    data() {
        return {
            companies: [],          // Усі пости
            selectedCompanies: [],  // Вибрані пости
            searchText: "",     // Текст пошуку
            itemsPerPage: 25,         // Кількість елементів на сторінці
            currentPage: 1,           // Поточна сторінка
            offset: 0,
            blockedCompanies: [],     // Блоковані компанії
            isLoading: true
        };
    },
    components: {
        'paging': Pagination
    },
    computed: {
        filteredCompanies() {
            if (!this.companies) {
                return []; // Повертаємо пустий масив, якщо дані ще не завантажені
            } else {
                return this.companies.filter(company => {
                    return company.title_company.includes(this.searchText);
                });
            }
        },
        // selectedCompanies() {
        //     return this.companies.filter(company => company.selected);
        // },
        paginatedCompanies() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.filteredCompanies.slice(start, end);
        },


        pageCount() {
            return Math.ceil(this.filteredCompanies.length / this.itemsPerPage);
        },

        offset: function () {
            return (this.currentPage === 0 ? 0 : this.currentPage - 1) * this.itemsPerPage;
        }
    },

    events: {
        'page-item': function (page) {
            this.currentPage = page;
            this.offset = page * this.count;
        }
    },
    methods: {
        getCompanyTitleById(companyId) {
            const company = this.companies.find(company => company.id === companyId);
            if (company) {
                const isBlocked = this.blockedCompanies.includes(companyId);
                return `${company.title_company} (${isBlocked ? 'Заблоковано' : 'Активний'})`;
            }
            return "";
        },
        toggleCompanySelection(companyId) {
            const isSelected = this.selectedCompanies.includes(companyId);
            const isBlocked = this.blockedCompanies.includes(companyId);

            if (isSelected && !isBlocked) {
                // Якщо компанія вибрана і не заблокована, заблокувати її
                this.blockedCompanies.push(companyId);
            } else if (!isSelected && isBlocked) {
                // Якщо компанія не вибрана, але заблокована, розблокувати її
                const index = this.blockedCompanies.indexOf(companyId);
                if (index !== -1) {
                    this.blockedCompanies.splice(index, 1);
                }
            }
            // Додати або видалити компанію зі списку вибраних
            this.toggleSelectedCompany(companyId);
        },
        toggleSelectedCompany(companyId) {
            const index = this.selectedCompanies.indexOf(companyId);
            if (index !== -1) {
                this.selectedCompanies.splice(index, 1);
            } else {
                this.selectedCompanies.push(companyId);
            }
        },
        saveSelectedCompanies() {
            // Логіка для збереження вибраних компаній
        },
        fetchCompanies() {
            axios.get('http://24city-laravel/api/companies') // Ваш маршрут для отримання компаній
                .then(response => {
                    // Додайте нові пости до вже наявних
                    this.companies = response.data;

                })
                .catch(error => {
                    console.error(error);
                });
        },
        changePage(page) {
            this.currentPage = page;
        },
        getPosts(api_url) {
            api_url = api_url || '/api/companies';
            fetch(api_url)
                .then(response => response.json())
                .then(response => {
                    this.companies = response.data;
                })
                .catch(err => console.log(err));
        }
    },
    mounted() {
        this.getPosts();
    },

};
</script>

<style scoped>

</style>
