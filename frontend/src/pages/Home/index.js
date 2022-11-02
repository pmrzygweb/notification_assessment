const Home = () => {
  return (
    <div className="flex justify-center">
      <div className="flex flex-col gap-4 border p-4">
        <div>
          <label htmlFor="category" className="block text-sm font-medium text-gray-300">Category</label>
          <input type="text" id="category" className="mt-1 border text-sm rounded-lg w-96 p-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. Sports, Finance, Movies" required></input>
        </div>
        <div>
          <label htmlFor="message" className="block text-sm font-medium text-gray-300">Message</label>
          <textarea type="text" id="message" className="mt-1 border text-sm rounded-lg w-96 h-32 p-2 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" required></textarea>
        </div>
        <div className="flex justify-center">
          <button type="button" className="bg-gray-700 text-white p-2 rounded font-bold">Submit</button>
        </div>
      </div>
    </div>
  );
};

export default Home;
