import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import org.w3c.dom.Attr;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import java.io.File;
import java.io.Console;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

public class CreateXml {

   public static void main(String argv[]) {
      String dbURL = "jdbc:mysql://127.0.0.1/voting_db";
        String username ="root";
        String password = "57074";
        int h = 0;
        String query1 ="select distinct count(candidate_ID) from candidate";
        try (Connection con = DriverManager.getConnection(dbURL, username, password);
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(query1)) {
            while (rs.next()) {
                h = rs.getInt(1);
            }
            System.out.println("count: " + h);
            con.close();
        } catch (SQLException ex) {
            Logger lgr = Logger.getLogger(CreateXml.class.getName());
            lgr.log(Level.SEVERE, ex.getMessage(), ex);
        }
        int m = 0;
        String query2 ="select count(vote_candidate_ID) from has_voted";
        try (Connection con = DriverManager.getConnection(dbURL, username, password);
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(query2)) {
            while (rs.next()) {
                m = rs.getInt(1);
            }
            System.out.println("count2: " + m);
            con.close();
        } catch (SQLException ex) {
            Logger lgr = Logger.getLogger(CreateXml.class.getName());
            lgr.log(Level.SEVERE, ex.getMessage(), ex);
        }

        String query ="select vote_candidate_ID from has_voted";
        try (Connection con = DriverManager.getConnection(dbURL, username, password);
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(query)) {
            int l = 0;
            int[] arr = new int[m];

            while (rs.next()) {
                arr[l] = rs.getInt("vote_candidate_ID");
                l++;
            }
            int[] arr2 = new int[h];
            for(int j = 1; j< h+1; j++){
                int counter = 0;
                for (int i = 0 ; i < m; i++ ) {
                    if (arr[i] == j) {
                        counter++;
                    }
                }
                arr2[j-1] = counter;
            }

            for(int j = 0; j< h; j++){
                System.out.println("arr2 : " + j + " : " + arr2[j]);
            }

            con.close();
        } catch (SQLException ex) {

            Logger lgr = Logger.getLogger(CreateXml.class.getName());
            lgr.log(Level.SEVERE, ex.getMessage(), ex);
        }

      try {
         DocumentBuilderFactory dbFactory =
         DocumentBuilderFactory.newInstance();
         DocumentBuilder dBuilder = dbFactory.newDocumentBuilder();
         Document doc = dBuilder.newDocument();
         Element rootElement = doc.createElement("candidate");
         doc.appendChild(rootElement);
            Element dis = doc.createElement("district");
            rootElement.appendChild(dis);
               Attr attr = doc.createAttribute("distict_id");
               attr.setValue("1");
                  dis.setAttributeNode(attr);
                  Element carname1 = doc.createElement("winner");
                  Attr attrType1 = doc.createAttribute("Candidate_id");
                     attrType1.setValue("2");
                     carname1.setAttributeNode(attrType1);
                     carname1.appendChild(doc.createTextNode("6 votes"));
                     dis.appendChild(carname1);
         TransformerFactory transformerFactory = TransformerFactory.newInstance();
         Transformer transformer = transformerFactory.newTransformer();
         DOMSource source = new DOMSource(doc);
         StreamResult result = new StreamResult(new File("C:\\Users\\mapha\\Desktop\\school\\cos 221\\wok\\Staff\\cars.xml"));
         transformer.transform(source, result);
         StreamResult consoleResult = new StreamResult(System.out);
         transformer.transform(source, consoleResult);
      } catch (Exception e) {
         e.printStackTrace();
      }
   }
}