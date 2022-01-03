<script>
    export default {
        name: "CartItems",
        props: ["cart-props"],
        data: function() {
            return {
                'cart': []
            }
        },
        mounted() {
            this.cart = this.cartProps;
        },
        methods: {
            deleteFromCart(cart) {
                axios.delete('/api/cart/'+ cart.id).then((res) => {
                    const index = this.cart.findIndex((obj) => obj.id === cart.id);
                    this.cart.splice(index, 1);
                }).catch((error) => {
                    console.log(error);
                })
            }
        },
        computed: {
            numberOfBooks() {
                return this.cart.length;
            },
            total() {
                let price = 0;
                for(let item of this.cart) {
                    price += item.book.price;
                }
                return price;
            }
        }
    }
</script>

<style scoped>

</style>
