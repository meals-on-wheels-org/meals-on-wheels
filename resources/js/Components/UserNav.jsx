export function UserNav() {
    return (
      <div className="relative">
        <button className="flex items-center gap-2">
          <img
            src="/avatar.png"
            alt="User"
            className="w-8 h-8 rounded-full"
          />
          <span>User Name</span>
        </button>
        {/* Dropdown menu content */}
      </div>
    )
  }
