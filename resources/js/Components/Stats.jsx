export function StatsCard({ title, value, trend }) {
    return (
      <div className="bg-white rounded-lg shadow p-6">
        <h3 className="text-sm text-gray-600">{title}</h3>
        <div className="mt-2 flex items-baseline">
          <p className="text-2xl font-semibold">{value}</p>
          {trend && (
            <span className={`ml-2 ${trend > 0 ? 'text-green-600' : 'text-red-600'}`}>
              {trend}%
            </span>
          )}
        </div>
      </div>
    )
  }
