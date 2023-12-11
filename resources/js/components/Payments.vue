<template>
    <div>
        <h2>Виберіть методи оплати:</h2>
        <div v-for="method in payments" :key="method.id">
            <label>
                <input type="checkbox" name="company_payments[]" v-model="selectedPaymentMethods" :value="method.id">
                <input type="hidden" name="company_payments_name[]" v-model="method.payment_name">
                {{ method.payment_name }}
            </label>
        </div>
        <button @click="addNewPayment" type="button">Додати новий метод оплати</button>
        <input v-model="newPaymentName" type="text" :name="getNewPaymentInputName()"
               placeholder="Введіть власний метод оплати">
    </div>
</template>

<script>
export default {
    name: 'Payments',
    data() {
        return {
            payments: null, // Тут буде зберігатися список методів оплати отриманих через API
            selectedPaymentMethods: [], // Тут буде зберігатися вибрані методи оплати
            newPaymentName: '', // Додайте цю змінну для зберігання імені нового методу оплати
            nextPaymentId: 1, // Додайте цю змінну для наступного унікального id

        };
    },
    methods: {
        async fetchPayments(api_url = '/api/payments') {

            try {
                const response = await fetch(api_url);

                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }

                const data = await response.json();
                this.paymentMethods = data.data;
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        },
        addNewPayment() {
            if (this.newPaymentName.trim() !== '') {
                const newPaymentId = this.nextPaymentId++;
                this.payments.push({id: newPaymentId, payment_name: this.newPaymentName});
                this.selectedPaymentMethods.push(newPaymentId);
                this.newPaymentName = '';
            }
        },
        getNewPaymentInputName() {
            // Повертає ім'я для нового інпута
            return 'company_payments[new_payment_method]';
        },
        getPosts() {
            axios.get('http://24city.laravel/api/payments')
                .then(response => {
                    this.payments = response.data;
                })
                .catch(error => {
                    console.error('Помилка завантаження категорій:', error);
                });
        },
    },
    mounted() {
        this.getPosts();
    }
};
</script>

<style scoped>
/* Ваш стиль компоненти тут */
</style>
