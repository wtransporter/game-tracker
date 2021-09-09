<template>
  <div 
        v-show="show"
        v-text="body"
        class=" transition duration-500 ease-in-out show right-8 bottom-8 fixed px-5 py-3 rounded-md"
        :class="'text-'+flashColor+'-900 bg-'+flashColor+'-300'"
        >
      
  </div>
</template>

<script>
export default {
    props: ['message', 'type'],

    data() {
        return {
            show: false,
            body: this.message,
            flashColor: 'green'
        }
    },

    created() {
        if (this.message) {
            this.flash();
        }

        window.events.$on('flash', data => this.flash(data));
    },

    methods: {
        flash(data) {
            if (data) {
                this.body = data.message;
                if (data.type) {
                    this.flashColor = data.type;
                }
            }

            this.show = true;

            this.hide();
        },

        hide() {
            setTimeout(() => {
                this.show = false;
            }, 4000);
        }
    },
}
</script>