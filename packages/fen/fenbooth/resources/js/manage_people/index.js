export default {
    data() {
        return { products: [] }
    },
    created() {
        this.axios.get('http://localhost:8000/api/people/').then(response => {
            this.products = response.data;
        });
    },
    methods: {
        deleteProduct(id) {
            this.axios.delete('http://localhost:8000/api/people/${id}').then(response => {
                let i = this.products.map(data => data.id).indexOf(id);
                this.products.splice(i, 1)
            });
        }
    }
} 