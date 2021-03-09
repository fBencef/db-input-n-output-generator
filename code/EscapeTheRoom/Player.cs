using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EscapeTheRoom
{
    class Player
    {
        public static string Position { get; set; }
        public static List<Object> Inventory { get; set; }

        public Player(/*var pos*/)
        {
            //Position = pos;
            Position = "nappali";
        }

        public void SetPosition(string input)
        {
            Position = input;
        }

        public static string ToExportString()
        {
            return "[player];" + Position;
        }
    }
}
