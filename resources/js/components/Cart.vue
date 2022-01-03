<script>
    export default {
        name: "Cart",
        props: ['book-props', 'user-props'],
        data: function() {
            return {
                book: {},
            }
        },
        mounted() {
            this.book = this.bookProps;
        },
        methods: {
            addToCart: function() {
                axios.put('/api/cart/'+this.userProps.id, { book: this.book.id}).then((result) => {
                    alert('Book successfully added to the cart!')
                }).catch((error) => { console.log(error)});
            }
        },
    }

</script>

<style scoped>

</style>
