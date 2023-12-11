<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <div class="row">
                <div class="input-group">
                    <div class="input-group-text">
                        <input v-model="item.phone" type="text" name="phones[]" placeholder="Phone Number">
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-group-text">
                        <input v-model="item.comment" name="phone_comment[]" type="text" placeholder="Comment to Phone">
                    </div>
                </div>
                <label>
                    <input v-model="item.isFax" name="fax[]" type="checkbox"> Fax
                </label>
                <button type="button" class="btn btn-danger" @click="removeItem(index)">Remove</button>
            </div>
        </div>
        <button type="button" class="btn btn-success" @click="addItem">Add Phone</button>
    </div>
    <ul class="list-group">
        <li class="list-group-item" v-for="(item, index) in items">{{ item.phone }}&nbsp;{{ item.comment }}</li>
    </ul>
</template>

<script>
export default {
    name: 'Phones',
    data() {
        return {
            items: [{phone: '', comment: '', isFax: false}]
        }
    },
    methods: {
        addItem(event) {
            event.preventDefault(); // Запобігання дії за замовчуванням
            this.items.push({phone: '', comment: '', isFax: false});

        },
        removeItem(index) {
            this.items.splice(index, 1);

        },
        sendDataToServer() {
            axios.post('admin/company/store', {items: this.items})
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },

};
</script>
