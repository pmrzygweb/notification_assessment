import './App.css';
import { Routes, Route } from 'react-router-dom';
import Home from './pages/Home';

function App() {
  return (
    <div className="h-screen bg-gray-900">
      <div className="container mx-auto px-4 py-20">
        <Routes>
          <Route exact path='/' element={<Home />} />
        </Routes>
      </div>
    </div>
  );
}

export default App;
