import './bootstrap';

import SearchForm from './components/SearchForm';
import SummonerProfile from './components/SummonerProfile';

const App = () => {
    // State to hold the summoner data fetched from the backend
    const [summonerData, setSummonerData] = useState(null);

    // Callback function to handle the summoner data received from the backend
    const handleSummonerData = (data) => {
      setSummonerData(data);
    };

    return (
      <div>
        <h1>League of Legends Profile Statistics Checker</h1>
        <SearchForm onSummonerData={handleSummonerData} />
        {summonerData && <SummonerProfile summonerData={summonerData} />}
      </div>
    );
  };

  // Render the App component to the root element of the HTML page
  ReactDOM.render(<App />, document.getElementById('root'));
