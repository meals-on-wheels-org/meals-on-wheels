export function Form({ children, onSubmit }) {
    return (
      <form onSubmit={onSubmit} className="space-y-4">
        {children}
      </form>
    )
  }

  export function FormField({ label, children }) {
    return (
      <div className="space-y-2">
        <label className="text-sm font-medium">{label}</label>
        {children}
      </div>
    )
  }
  