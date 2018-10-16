Vue.component("modal", {
    template: `
    <div class="modal is-active" @keydown.esc="$emit('close')">
      <div class="modal-background"></div>
      <div class="modal-card">
         <header class="modal-card-head">
           <p class="modal-card-title"><slot name="title">Muuda rühma</slot></p>
           <button class="delete" @click="$emit('close')"></button>
         </header>
         <section class="modal-card-body">
           <slot></slot>
         </section>
         </div>
    </div>
    `,

    data() {
        return {
            // active: false
        };
    },

    methods: {
        close() {
            this.$emit("close");
        }
    },

    mounted() {
      let self = this;
      window.addEventListener('keyup', function(event) {
        if(event.keyCode == 27) {
          self.$emit("close");
        }
      });
        // document.onkeydown = function(evt) {
        //     evt = evt || window.event;
        //     var isEscape = false;
        //     if ("key" in evt) {
        //         isEscape = evt.key == "Escape" || evt.key == "Esc";
        //     } else {
        //         isEscape = evt.keyCode == 27;
        //     }
        //     if (isEscape) {
        //         alert("Escape");
        //     }
        // };
    }
});
