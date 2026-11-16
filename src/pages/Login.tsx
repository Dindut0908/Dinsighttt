import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { useAuth } from '../hooks/useAuth';
import Button from '../components/ui/Button';
import Input from '../components/ui/Input';

const Login = () => {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');
  const { signIn } = useAuth();
  const navigate = useNavigate();

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setError('');
    setLoading(true);
    const { error: err } = await signIn(email, password);
    setLoading(false);
    if (err) {
  console.error('LOGIN ERROR:', err);
  setError(err.message);
} else {
      navigate('/admin/dashboard');
    }
  };

  return (
  <div className="min-h-screen flex items-center justify-center px-6 bg-slate-100 dark:bg-[#070B14]">
    <form
      onSubmit={handleSubmit}
      className="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/10 rounded-[32px] p-10 shadow-2xl"
    >
      <h1 className="text-3xl text-white font-bold mb-8">
        Login
      </h1>

      <Input
        label="Email"
        type="email"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
        required
      />

      <Input
        label="Password"
        type="password"
        value={password}
        onChange={(e) => setPassword(e.target.value)}
        required
      />

      {error && (
        <div className="mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
          {error}
        </div>
      )}

      <Button
        type="submit"
        variant="primary"
        disabled={loading}
        className="w-full"
      >
        {loading ? 'Memproses...' : 'Login'}
      </Button>
    </form>
  </div>
);
};

export default Login;
