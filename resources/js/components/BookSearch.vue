<template>
    <div class="search_form d-flex flex-column">
        <div class="search_block">
            <input type="text" v-model="query" @input.prevent="search" class="form-control" placeholder="Search here...">
            <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
        <div class="book_search__results d-none flex-column">
            <div class="book_search__results__item w-100" v-for="(result, index) in results">
                <a :href="result.link">
                    <div class="row d-flex" style="height: 30px">
                        <div class="col-12">
                            <div class="title-block">
                                {{ index+1 }}. {{ result.author }}, {{ result.title }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BookSearch",
        data: function() {
            return {
                query: null,
                results: []
            }
        },
        methods: {
            search: function() {
                axios.get('/api/books/search',  { params: { query: this.query } }).then((result) => {
                    this.results = result.data.result;
                    if(this.results.length > 0) {
                        let searchBlock = document.getElementsByClassName('book_search__results')[0];
                        searchBlock.classList.remove('d-none');
                        searchBlock.classList.add('d-flex');
                    } else {
                        let searchBlock = document.getElementsByClassName('book_search__results')[0];
                        searchBlock.classList.remove('d-flex');
                        searchBlock.classList.add('d-none');
                    }
                }).catch((error) => { console.log(error)});
            }
        },
    }

</script>

<style scoped>

</style>
