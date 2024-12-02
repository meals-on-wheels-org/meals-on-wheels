export default function Header() {
    return (
      <header className="bg-white border-b border-gray-200 p-4">
        <div className="flex justify-between items-center">
          <h1 className="text-xl font-semibold">Dashboard</h1>
          <div className="flex items-center gap-4">
            <UserNav />
            <ThemeToggle />
          </div>
        </div>
      </header>
    )
  }
  