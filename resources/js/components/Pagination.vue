<template id="page">
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
</template>

<script>
export default {
    data: function () {
        return {
            n: 0,
            active: 1
        }
    },

    props: ['companies', 'count', 'type'],

    computed: {
        length: function () {
            console.log('length' + this.companies.length)
            console.log('count' + this.count)
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
            var temp = [];
            for (var i = this.min; i < this.max; i++) {
                temp.push(i);
            }
            return temp
        }
    },

    methods: {
        update: function (n) {
            this.active = n;
            this.$emit('page-item', this.active); // Відправити подію до батьківського компонента
        }
    }
}
</script>

<style scoped>

</style>
