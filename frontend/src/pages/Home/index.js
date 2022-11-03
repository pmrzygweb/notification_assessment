import { useEffect, useState } from "react";
import Select from 'react-select';
import api from '../../http/api';
import moment from 'moment';

const Home = () => {
  const [categories, setCategories] = useState(null);
  const [logs, setLogs] = useState(null);
  const [selectedCategory, setSelectedCategory] = useState(null);
  const [message, setMessage] = useState(null);

  const selectStyles = {
    control: (base, state) => ({
      ...base,
      backgroundColor: '#374151',
    }),
    singleValue: (base, state) => ({
      ...base,
      color: 'white',
    }),
  };

  useEffect(() => {
    fetchCategories();
    fetchLogs();
  }, []);

  const fetchCategories = () => {
    api.get('/message_types')
    .then(res => {
      setCategories(res.data.message_types.map(el => {
        return {
          value: el,
          label: el
        }
      }));
    });
  };

  const fetchLogs = () => {
    api.get('/logs')
    .then(res => {
      setLogs(res.data.logs);
    });
  };

  const submit = () => {
    if (selectedCategory && message) {
      api.post('/send_message', {
        message_type: selectedCategory.value,
        message_content: message
      })
      .then(res => {
        fetchLogs();
      });
      setMessage(null);
    }
  };
  
  return (
    <div className="flex flex-col gap-8 items-center">
      <div className="flex flex-col gap-4 border p-4">
        <div>
          <label htmlFor="category" className="block text-sm font-medium text-gray-300">Category</label>
          <Select
            className="mt-1"
            styles={selectStyles}
            options={categories}
            onChange={setSelectedCategory}
          />
        </div>
        <div>
          <label htmlFor="message" className="block text-sm font-medium text-gray-300">Message</label>
          <textarea
            type="text"
            id="message"
            className="w-96 h-32 mt-1 border text-sm rounded-lg p-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500"
            onChange={(event) => setMessage(event.target.value)}
            value={message}
          >
        </textarea>
        </div>
        <div className="flex justify-center">
          <button
            type="button"
            className="bg-gray-700 text-white p-2 rounded font-bold"
            onClick={submit}
          >
            Submit
          </button>
        </div>
      </div>
      {logs?.length > 0 ? (
        <table className="table-auto mt-8">
          <thead>
            <tr>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Name</th>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Email</th>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Phone</th>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Category</th>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Type</th>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Message</th>
              <th className="text-slate-200 text-left border-slate-600 pr-12">Created</th>
            </tr>
          </thead>
          <tbody>
            {logs?.map(el => {
              return (
                <tr key={el.id} className="border-b border-slate-700 text-slate-400">
                  <td className="py-4 pr-12">{el.user.name}</td>
                  <td className="py-4 pr-12">{el.user.email}</td>
                  <td className="py-4 pr-12">{el.user.phone}</td>
                  <td className="py-4 pr-12">{el.message_type}</td>
                  <td className="py-4 pr-12">{el.notification_type}</td>
                  <td className="py-4 pr-12">{el.message_content}</td>
                  <td className="py-4 pr-12">{moment(el.created_at).format('DD MMM, YYYY hh:mm a')}</td>
                </tr>
              );
            })}
          </tbody>
        </table>
      ) : (
        <p className="font-bold text-white text-xl">No logs yet</p>
      )}
    </div>
  );
};

export default Home;
