<template>
    <div>
        <form @submit.prevent="assign">
            <button type="submit" class="text-blue-500 hover:text-blue-700 w-4">
                <span v-if="isVisible">
                    Assign
                </span>
                <span v-else>
                    Remove
                </span>
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'AttachClub',
    props: ['competition', 'club', 'visible'],

    data() {
        return {
            isVisible: this.visible
        }
    },

    methods: {
        assign() {
            axios.post(`/competitions/${this.competition.id}/store/${this.club.id}`)
            .then((response) => {
                this.isVisible = !this.isVisible;
            });
        },
    },
}
</script>