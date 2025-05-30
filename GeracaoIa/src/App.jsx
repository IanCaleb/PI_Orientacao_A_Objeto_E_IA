import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import { useState } from 'react'

import LoginCadastro from './pages/LoginCadastro';

import './App.css'
import '../src/index.css'

function App() {
  return (
    <>
      <Router>
        <Routes>
          <Route path="/" element={<LoginCadastro />} />
        </Routes>
      </Router>
    </>
  )
}

export default App