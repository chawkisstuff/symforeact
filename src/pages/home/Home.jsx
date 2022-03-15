import FeaturedInfo from "../../components/featuredInfo/FeaturedInfo";
import "./home.css";
import WidgetSm from "../../components/widgetSm/WidgetSm";

export default function Home() {
  return (
    <div className="home">
      <div className="homeWidgets">
        <WidgetSm/>
      </div>
    </div>
  );
}
