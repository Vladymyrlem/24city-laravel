<template>

    <div>
        <ul>
            <!-- Відобразіть пости з властивості displayedItems -->
            <li v-for="company in displayedItems" :key="company.id">
                <!-- Ваш код для відображення поста -->
            </li>
        </ul>
        <nav aria-label="Page navigation">

            <ul class="pagination">

                <li class="page-item" v-if="active > 3 && length > 6">
                    <a class="page-link" href="#" @click.stop.prevent="update(0)">{{ 1 }}</a>
                </li>

                <li v-if="active > 3 && length > 6" class="disabled page-item">
                    <a class="page-link" href="#">...</a>
                </li>

                <li class="page-item" v-for="n in numbers" :class="{'active' : n === active}">
                    <a class="page-link" href="#" @click.stop.prevent="update(n)">{{ n + 1 }}</a>
                </li>

                <li v-if="active < length-4 && length > 6" class="disabled page-item">
                    <a class="page-link" href="#">...</a>
                </li>

                <li class="page-item" v-if="active < length-4 && length > 6">
                    <a class="page-link" href="#" @click.stop.prevent="update(length-1)">{{ length }}</a>
                </li>

            </ul>
        </nav>
    </div>
</template>
<script>
export default {
    name: 'Pagination',
    data: function () {
        return {
            n: 0,
            active: 0,
        }
    },

    props: ['companies', 'count', 'type'],

    computed: {
        length: function () {
            console.log('length: ' + this.companies.length)
            console.log('count: ' + Math.ceil(this.companies.length / this.count))
            return Math.ceil(this.companies.length / this.count);
        },

        min: function () {
            if (this.active < 3) {
                return 0;
            } else if (this.active > this.length - 4) {
                return this.length - 5;
            } else {
                return this.active - 2;
            }
        },

        max: function () {
            if (this.length < 6) {
                return this.length;
            } else if (this.active < 3) {
                return 5;
            } else if (this.active > this.length - 4) {
                return this.length;
            } else {
                return this.active + 3;
            }
        },

        numbers: function () {
            const pageCount = Math.ceil(this.companies.length / this.count);
            const min = this.active < 3 ? 0 : this.active - 2;
            const max = this.active < 3 ? Math.min(5, pageCount) : Math.min(this.active + 3, pageCount);

            return Array.from({length: max - min}, (_, i) => min + i);
        },


        displayedItems() {
            const start = this.active * this.count;
            const end = start + this.count;
            return this.companies.slice(start, end);
        },
    },

    methods: {
        update: function (n) {
            this.active = n;
            this.$emit('page-item', this.active);
        },
    }
}
</script>
