import React from 'react';
import { InertiaApp } from '@inertiajs/inertia-react';

const App = () => {
  return (
    <InertiaApp
      initialPage={JSON.parse(document.getElementById('app').dataset.page)}
      resolveComponent={name => require(`./Pages/${name}`).default}
    />
  );
}

export default App;
