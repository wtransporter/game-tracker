<template>
    <div>
    <p v-show="errors.length > 0" class="text-red-700 text-xs mt-2 p-3 bg-red-200 rounded font-semibold relative">
        <span v-for="(error, index) in errors" :key="index" class="block">
            {{ error[0] }}
        </span>
        <a @click.prevent="dismiss" href="#" class="absolute top-1 right-2 text-red-800">x</a>
    </p>
    <form @submit.prevent="store">
        <div class="space-y-2">
            <div>
                <label for="name" class="block text-sm text-gray-800">Competition name</label>
                <input v-model="competitionName" id="name" type="text" name="name" class="h-8 rounded" required>
            </div>
            <div>
                <label for="size" class="block text-sm text-gray-800">Number of groups</label>
                <input id="size" v-model="numberOfGroups" type="number" name="size" class="h-8 rounded" required>
            </div>
            <div>
                <label for="group_size" class="block text-sm text-gray-800">Number of clubs in group</label>
                <input id="group_size" v-model="groupSize" type="number" name="group_size" class="h-8 rounded" required>
            </div>
            <button class="px-3 py-1 bg-blue-600 hover:bg-blue-700 transition duration-200 ease-in-out rounded text-white">Next</button>
        </div>
    </form>
    </div>
</template>

<script>
export default {
    name: 'CompetitionCreate',

    props: ['route'],

    data() {
        return {
            storeRoute: this.route,
            competitionName: '',
            numberOfGroups: null,
            groupSize: null,
            errors: []
        }
    },

    methods: {
        store() {
            let newCompetition = {
                'name': this.competitionName,
                'size': this.numberOfGroups,
                'group_size': this.groupSize
            };

            axios.post(this.storeRoute, newCompetition)
                .then((response) => {
                    flash(`Competition ${response.data.name} added.`);
                    this.resetFields();
                })
                .catch((error) => {
                    this.errors = Object.values(error.response.data.errors);
                });
        },

        resetFields() {
            this.competitionName = '';
            this.numberOfGroups = null;
            this.groupSize = null;
            this.errors = [];
        },

        dismiss() {
            this.errors = [];
        }
    }
}
</script>