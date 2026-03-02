<div
    x-data="toastComponent()"
    x-on:toast.window="show($event.detail)"
    class="z-50 fixed inset-0 pointer-events-none flex flex-col items-end p-6"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="toast.visible"
            x-transition
            class="pointer-events-auto max-w-sm w-full bg-white shadow-lg rounded-xl p-4 mb-3"
        >
            <div class="flex">
                <div class="mr-3">
                    <i x-text="toast.icon" class="material-symbols-outlined" :class="'text-' + toast.color + '-500'"> </i>
                </div>

                <div class="flex-1">
                    <p class="font-semibold" x-text="toast.title"></p>
                    <p class="text-sm text-gray-500" x-text="toast.body"></p>
                </div>

                <x-icon code="close" @click="remove(toast.id)" class="ml-4 text-gray-400 hover:text-gray-600 cursor-pointer" />
            </div>
        </div>
    </template>
</div>

<script>
function toastComponent() {
    return {
        toasts: [],

        show(data) {
            let id = Date.now()

            let typeMap = {
                danger: { color: 'red', icon: 'error' },
                warning: { color: 'yellow', icon: 'warning' },
                success: { color: 'green', icon: 'check_circle_outline' },
                info: { color: 'blue', icon: 'info' },
                secondary: { color: 'gray', icon: 'info' }
            }

            let config = typeMap[data.type] ?? typeMap.info

            this.toasts.push({
                id,
                title: data.title,
                body: data.body,
                visible: true,
                color: config.color,
                icon: config.icon
            })

            setTimeout(() => {
                this.remove(id)
            }, data.time ?? 5000)
        },

        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id)
        }
    }
}
</script>