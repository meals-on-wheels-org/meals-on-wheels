import { Link } from '@inertiajs/react'

export default function Sidebar() {
  return (
    <aside className="w-64 bg-gray-900 text-white">
      <nav className="p-4">
        <div className="space-y-4">
          <Link href="/dashboard">Dashboard</Link>
          <Link href="/analytics">Analytics</Link>
          <Link href="/settings">Settings</Link>
        </div>
      </nav>
    </aside>
  )
}

