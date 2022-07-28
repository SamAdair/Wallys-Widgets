<template>

    <form class="text-black text-center p-3" @submit.prevent="SubmitForm">
        <input type="hidden" name="_token" :value="csrf">

        <div class="inline-block">
            
            <label for="widgets" class="text-center block text-xl mb-2">Widgets Required:</label>
            <input id="widgets" v-model="fields.widgets" type="number" min=0 class="p-2 border-gray-400 border-2" required>
            <div v-if="errors && errors.widgets" class="text-right text-red-600">{{ errors.widgets[0] }}</div>
            <div class="mt-3">
                <button class="pl-4 pr-4 pt-2 pb-2 bg-blue-100">Calculate</button>
            </div>

            <div class="mt-5 text-xl" v-show="displayResults">
                Packs required:
            </div>

            <div :key="result.pack" v-for="result in results" class="text-xl">
                {{ result.qty }} x {{ result.pack }}
            </div>

        </div>

    </form>

</template>

<script>
    export default {
        props: ['widgetDataUrl'],
        data: function() {
            return {
                fields: {},
                errors: {},
                results: {},
                displayResults: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        methods: {

            SubmitForm() {
                this.errors = {};
                axios.post(this.widgetDataUrl, this.fields).then(response => {
                
                    this.results = response.data;
                    this.displayResults = true;
                
                }).catch(error => {

                    this.displayResults = false;

                    if (error.response.status === 422)
                    {
                    
                        //Invalid data
                        this.errors = error.response.data.errors;
                    
                    } else {

                        //Other error - If this was not interview code, this would be handled properly depending on the HTTP response
                        alert("An error has occured");
                        console.log(error);
                    
                    }
                });
            }

        },
    }
</script>
