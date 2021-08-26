<template>
    <div>
        <form>
            <div class="space-y-2">
                <div>
                    <label for="title" class="block text-sm text-gray-800">Competition name</label>
                    <input id="title" v-model="title" type="text" name="title" class="h-8 rounded">
                </div>
                <div>
                    <label for="size" class="block text-sm text-gray-800">Number of groups</label>
                    <input id="size" v-model="size" type="number" name="size" class="h-8 rounded">
                </div>
                <div>
                    <label for="group_size" class="block text-sm text-gray-800">Number of clubs in group</label>
                    <input id="group_size" v-model="group_size" type="number" name="group_size" class="h-8 rounded">
                </div>
                <button @click.prevent="store" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 transition duration-200 ease-in-out rounded text-white">Next</button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: '',
            size: 0,
            group_size: 0
        }
    },

    methods: {
        store() {
            let newCompetiotion = { 
                name: this.title,
                size: this.size,
                group_size: this.group_size
            };

            axios.post('/competitions', newCompetiotion)
            .then((response) => {
                this.title = '';
                this.size = 0;
                this.group_size = 0;
            });

        },
    }
}
</script>