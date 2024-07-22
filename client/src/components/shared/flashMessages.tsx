import { toast } from 'react-toastify'

// export interface FlashMessage {
//   message_type: string;
//   message: string;
// }

const flashMessage = (message_type: string, message: string) => {
  switch(message_type) {
    case "success":
      toast.success(message)
      break
    case "danger":
      toast.error(message)
      break
    case "warning":
      toast.warn(message)
      break
    case "info":
      toast.info(message)
      break
    default:
  }
}

export default flashMessage
